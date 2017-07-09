function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

var RedmineHelpdeskWidget = {
  widget: document.getElementById('helpdesk_widget'),
  widget_button: null,
  width: 335,
  height: 500,
  margin: 20,
  iframe: null,
  form: null,
  schema: null,
  reload: false,
  configuration: {
      "title": "<h1>Contact Ask Idea</h1>" + "<p>Let us know how we can help.</p>"
  },
  attachment: null,
  base_url: 'https://redmine.marksmanrsc.com',
  config: function(configuration){
    this.configuration = configuration;
    this.apply_config();
  },
  apply_config: function(){
    if (this.configuration['color']) {
      this.widget_button.style.backgroundColor = this.configuration['color'];
    }
    switch (this.configuration['position']) {
      case 'topLeft':
        this.widget.style.top = '20px';
        this.widget.style.left = '20px';
        break;
      case 'topRight':
        this.widget.style.top = '20px';
        this.widget.style.right = '20px';
        break;
      case 'bottomLeft':
        this.widget.style.bottom = '20px';
        this.widget.style.left = '20px';
        break;
      case 'bottomRight':
        this.widget.style.bottom = '20px';
        this.widget.style.right = '20px';
        break;
      default:
        widget.style.bottom = '20px';
        widget.style.right = '20px';
    }
  },
  translation: function(field){
    return this.configuration['translation'] && this.configuration['translation'][field] ? this.configuration['translation'][field] : null;
  },
  identify: function(field){
    return this.configuration['identify'] && this.configuration['identify'][field] ? this.configuration['identify'][field] : null
  },
  load: function() {
    this.widget.addEventListener('click', function(){ RedmineHelpdeskWidget.toggle() });
    this.create_widget_button();
    this.decorate_widget_button();
    this.create_iframe();
    this.decorate_iframe();
    this.load_schema();
    this.created = true;
  },
  load_schema: function() {
    var xmlhttp = getXmlHttp();
    xmlhttp.open('GET', this.base_url + '/helpdesk_widget/load_form.json', true);
    xmlhttp.responseType = 'json';
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4) {
        if (xmlhttp.status == 200 || xmlhttp.status == 304) {
          
          console.log(xmlhttp.response);  
            
          // RedmineHelpdeskWidget.schema = xmlhttp.response;
          RedmineHelpdeskWidget.schema = {
            "projects": {
                "Talk to a sales rep": 30,
                "Customer support": 31,
                "Other": 31
            },
            "projects_data": {
                30: {
                    "trackers": {
                        "Lead": 6
                    }
                },
                31: {
                    "trackers": {
                        "Support": 3,
                        "Tasks": 4
                    }
                }
            }
          };
          
          RedmineHelpdeskWidget.fill_form();
        } else {
          RedmineHelpdeskWidget.schema = {};
        }
      }
    };
    xmlhttp.send(null);
  },
  create_widget_button: function(){
    button = document.createElement('div');
    button.id = 'widget_button';
    button.className = 'widget_button';
    button.innerHTML = 'Contact Us';
    button.setAttribute('name', 'helpdesk_widget_button');
    button.style.backgroundColor = '#0288D1';
    // button.style.backgroundSize = '15px 15px';
    button.style.cursor = 'pointer';
    button.style.color = 'white';
    button.style.textAlign = 'center';
    button.style.fontSize = '12px';
    button.style.verticalAlign = 'middle';
    button.style.lineHeight = '54px';
    button.style.borderRadius = '30px';
    button.style.boxShadow = 'rgba(0, 0, 0, 0.258824) 0px 2px 5px 0px';
    this.widget_button = button;
    this.widget.appendChild(button);
  },
  decorate_widget_button: function(){
    widget = this.widget;
    widget.style.position = 'fixed';
    widget.style.bottom = '20px';
    widget.style.right = '20px';
    widget.style.width = '10em';
    widget.style.height = '54px';
    widget.style.zIndex = 9999;
    widget.style.transition = '0.1s';
  },
  create_iframe: function(){
    this.iframe = document.createElement('iframe');
    this.widget.appendChild(this.iframe);
  },
  decorate_iframe: function(){
    iframe = this.iframe;
    iframe.setAttribute('id', 'helpdesk_ticket_container');
    // iframe.setAttribute('width', this.width);
    iframe.setAttribute('width', this.width);
    iframe.setAttribute('height', 0);
    iframe.setAttribute('frameborder', 0);
    iframe.style.display = 'none';
    iframe.style.position = 'absolute';
    // iframe.style.width = this.width;
    iframe.style.width = this.width;
    iframe.style.backgroundColor = 'white';
    iframe.style.boxShadow = 'rgba(0, 0, 0, 0.258824) 0px 1px 4px 0px';
    iframe.setAttribute('name', 'helpdesk_widget_iframe');
  },
  fill_form: function(){
    if (Object.keys(this.schema.projects).length > 0) {
      this.create_form();
      this.create_form_title();
      this.create_error_flash();

      this.create_form_text(this.form, 'username', 'username', this.translation('nameLabel') || 'Your name', 'form-control', this.identify('nameValue'), true);
      this.create_form_text(this.form, 'email', 'email' , this.translation('emailLabel') || 'Email address', 'form-control', this.identify('emailValue'), true);
      this.create_form_text(this.form, 'subject', 'issue[subject]' , this.translation('subjectLabel') || 'Subject', 'form-control', this.identify('subjectValue'), true);
      
      this.create_projects_selector();
      
      this.create_form_area(this.form, 'description', 'issue[description]' , this.translation('descriptionLabel') || 'Let us know how we can help...', 'form-control', true);

      var project_id = null;
      var tracker_id = null;
      if (RedmineHelpdeskWidget.configuration['identify']){
        project_id = RedmineHelpdeskWidget.schema.projects[RedmineHelpdeskWidget.configuration['identify']['projectValue']];
        if (project_id) {
          tracker_id = RedmineHelpdeskWidget.schema.projects_data[project_id].trackers[RedmineHelpdeskWidget.configuration['identify']['trackerValue']];
        }
      }
      this.load_project_data(project_id || this.schema.projects[Object.keys(this.schema.projects)[0]], tracker_id);
      this.iframe.contentWindow.document.body.appendChild(this.form);
      this.append_stylesheets();
      this.append_scripts();
      this.create_message_listener();
    } else {
      this.widget.style.display = 'none';
    }
  },
  append_stylesheets: function(){

    if (this.configuration['styles']) {
      css = document.createElement('style');
      css.innerHTML = this.configuration['styles'];
    } else {
      css = document.createElement('link');
      css.href = this.base_url + '/helpdesk_widget/widget.css';
      css.rel = "stylesheet";
    }
    css.type = "text/css";
    this.iframe.contentWindow.document.head.appendChild(css);
  },
  append_scripts: function(){
    script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = this.base_url + '/helpdesk_widget/iframe.js';
    this.iframe.contentWindow.document.head.appendChild(script);

    config_script = document.createElement('script');
    config_script.innerHTML = "var RedmineHelpdeskIframe = {configuration: "+ JSON.stringify(this.configuration) +"}";
    this.iframe.contentWindow.document.head.appendChild(config_script);
  },
  create_form: function(){
    this.form = document.createElement('form');
    this.form.action = this.base_url + '/helpdesk_widget/create_ticket';
    this.form.acceptCharset = 'UTF-8';
    this.form.method = 'post';
    this.form.id = 'widget_form';
    this.form.setAttribute('onSubmit', 'submitTicketForm(); return false;');
    this.form.style.marginBottom = 0;
  },
  create_form_title: function(){
    if (this.configuration['title']) {
      title_div = document.createElement('div');
      title_div.id = 'title';
      title_div.className = 'title';
      title_div.innerHTML = this.configuration['title'];
      this.form.appendChild(title_div);
    }
  },
  create_error_flash: function(){
    flash_div = document.createElement('div');
    flash_div.id = 'flash';
    flash_div.className = 'flash';
    this.form.appendChild(flash_div);
  },
  create_projects_selector: function(){
    var project_id = null;
    if (RedmineHelpdeskWidget.configuration['identify']){
      project_id = RedmineHelpdeskWidget.schema.projects[RedmineHelpdeskWidget.configuration['identify']['projectValue']];
    }
    this.create_form_select(this.form, 'project_id', 'project_id', RedmineHelpdeskWidget.schema.projects, project_id, 'form-control projects');
  },
  load_project_data: function(project_id, tracker_id){
    container_div = this.form.getElementsByClassName('container')[0]
    if (container_div) { container_div.remove() };

    container_div = document.createElement('div');
    container_div.id = 'container';
    container_div.className = 'container';

    custom_div = document.createElement('div');
    custom_div.id = 'custom_fields';
    custom_div.className = 'custom_fields';

    submit_div = document.createElement('div');
    submit_div.id = 'submit_button';
    submit_div.className = 'submit_button';

    container_div.appendChild(custom_div);
    container_div.appendChild(submit_div);

    this.create_form_select(custom_div, 'tracker_id', 'tracker_id', this.schema.projects_data[project_id].trackers, tracker_id, 'form-control trackers');
    tracker_id = custom_div.getElementsByClassName('trackers')[0].value;
    this.load_custom_fields(custom_div, project_id, tracker_id);

    this.create_form_submit(submit_div, this.translation('createButtonLabel') || 'Send');
    this.create_attch_link(submit_div);

    this.form.appendChild(container_div);
  },
  reload_project_data: function(){
    project_id = this.form.getElementsByClassName('projects')[0].value;
    tracker_id = container_div.getElementsByClassName('trackers')[0].value;

    this.load_project_data(project_id, tracker_id);
    this.positionate_iframe();
  },
  create_form_select: function(target, field_id, field_name, values, selected, field_class){

    if (Object.keys(values).length == 1) {
      field = document.createElement('input');
      field.type = 'hidden';
      field.id  = field_id;
      field.name  = field_name;
      field.className = field_class;
      field.value = values[Object.keys(values)[0]];
    } else {
      field = document.createElement('select');
      field.id = field_id;
      field.name = field_name;
      field.className = field_class;
      for (var project in values) {
        option = document.createElement('option');
        option.value = values[project]
        if(values[project] == selected) { option.selected  = 'selected'; }
        option.innerHTML = project;
        field.appendChild(option);
      }
    }
    field.setAttribute('onChange', 'needReloadProjectData();');
    target.appendChild(field);
  },
  create_form_text: function(target, field_id, field_name, field_placeholder, field_class, value, required){
    field = document.createElement('input');
    field.type = 'text';
    field.id  = field_id;
    field.name  = field_name;
    field.value  = value;
    field.placeholder = field_placeholder;
    field.className = required ? field_class + ' required-field' : field_class;
    target.appendChild(field);
  },
  create_form_area: function(target, field_id, field_name, field_placeholder, field_class, required){
    field = document.createElement('textarea');
    field.cols = 55;
    field.rows = 10;
    field.id  = field_id;
    field.name  = field_name;
    field.placeholder = field_placeholder;
    field.className = required ? field_class + ' required-field' : field_class;
    target.appendChild(field);
  },
  create_form_submit: function(target, label){
    field = document.createElement('input');
    field.type = 'submit';
    field.name = 'submit';
    field.className = 'btn';
    field.value = label;
    field.title = this.translation('buttomLabel') || '';
    if (RedmineHelpdeskWidget.configuration['color']) {
      field.style.background = RedmineHelpdeskWidget.configuration['color'];
    }
    target.appendChild(field);
  },
  create_attch_link: function(target){
    if (this.configuration['attachment'] != false ) {
      attach_div = document.createElement('div');
      attach_div.className = 'attach_div';

      attach_link = document.createElement('a');
      attach_link.className = 'attach_link';
      attach_link.href = 'javascript:void(0)';
      attach_link.innerHTML = 'Attach a file';
      attach_div.appendChild(attach_link);

      attach_field = document.createElement('input');
      attach_field.type = 'file';
      attach_field.id = 'attachment';
      attach_field.className = 'attach_field';
      attach_field.name = 'attachment';
      attach_field.attributes['data-max-size'] = 20971520;
      attach_field.addEventListener('change', function(){ RedmineHelpdeskWidget.upload_file() });
      attach_div.appendChild(attach_field);
      this.attachment = attach_field;

      target.appendChild(attach_div);
    }
  },
  upload_file: function(){
    if (this.attachment.attributes['data-max-size'] > this.attachment.files[0].size) {
      this.read_file(this.attachment.files[0], function(e){
        attach_field = RedmineHelpdeskWidget.form.getElementsByClassName('attach_field')[0]
        attach_field.attributes['data-value'] = e.target.result;
        displayed_name = (attach_field.files[0].name.length <= 20) ? attach_field.files[0].name : attach_field.files[0].name.substring(0, 20) + '...';
        RedmineHelpdeskWidget.form.getElementsByClassName('attach_link')[0].innerHTML = displayed_name;
      });
    }  else {
      this.attachment.attributes['data-value'] = '';
      RedmineHelpdeskWidget.form.getElementsByClassName('attach_link')[0].innerHTML = 'Sorry, too large';
    }
  },
  read_file: function(file, callback){
    var reader = new FileReader();
    reader.onload = callback
    reader.readAsDataURL(file);
  },
  load_custom_fields: function(target, project_id, tracker_id){
    var xmlhttp = getXmlHttp();
    var params = 'project_id=' + encodeURIComponent(project_id) + '&tracker_id=' + encodeURIComponent(tracker_id);
    custom_div = document.createElement('div');
    xmlhttp.open('GET', this.base_url + '/helpdesk_widget/load_custom_fields?' + params, true);
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4) {
        if (xmlhttp.status == 200 || xmlhttp.status == 304) {
          custom_div.innerHTML = xmlhttp.responseText;
          target.appendChild(custom_div);
          RedmineHelpdeskWidget.set_custom_values();
          RedmineHelpdeskWidget.positionate_iframe();
        }
      }
    };
    xmlhttp.send(null);
  },
  set_custom_values: function(){
    if (this.configuration['identify'] && this.configuration['identify']['customFieldValues']){
      for(var cf in this.configuration['identify']['customFieldValues']) {
        custom_field = this.form.querySelector('#issue_custom_field_values_' + this.schema.custom_fields[cf])
        if (custom_field){
          switch (custom_field.tagName){
            case 'INPUT':
              custom_field.value = this.configuration['identify']['customFieldValues'][cf];
              break;
            case 'SELECT':
              options = custom_field.options;
              for(var option, index = 0; option = options[index]; index++) {
                if(option.value == this.configuration['identify']['customFieldValues'][cf]) {
                  custom_field.selectedIndex = index;
                  break;
                }
              }
              break;
          }
        }
      }
    }
  },
  positionate_iframe: function(){
    widget_height = this.form.offsetHeight > this.height ? this.height : this.form.offsetHeight;
    this.iframe.setAttribute('height', this.margin + widget_height);
    switch (this.configuration['position']) {
      case 'topLeft':
        this.iframe.style.top = (this.margin + this.widget_button.offsetWidth) + 'px';
        iframe.style.left = (this.margin - this.widget_button.offsetWidth / 2) + 'px';
        break;
      case 'topRight':
        this.iframe.style.top = (this.margin + this.widget_button.offsetWidth) + 'px';
        iframe.style.left = (this.margin + this.widget_button.offsetWidth - this.width - 20) + 'px';
        break;
      case 'bottomLeft':
        this.iframe.style.top = (- this.margin * 2 - widget_height) + 'px';
        iframe.style.left = (this.margin - this.widget_button.offsetWidth / 2) + 'px';
        break;
      case 'bottomRight':
        this.iframe.style.top = (- this.margin * 2 - widget_height) + 'px';
        iframe.style.left = (this.margin + this.widget_button.offsetWidth - this.width - 20) + 'px';
        break;
      default:
        this.iframe.style.top = (- this.margin * 2 - widget_height) + 'px';
        iframe.style.left = (this.margin + this.widget_button.offsetWidth - this.width - 20) + 'px';
    }
  },
  create_message_listener: function(){
    var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
    var eventer = window[eventMethod];
    var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

    eventer(messageEvent,function(e) {
      data = JSON.parse(e.data);
      if (data['reload'] == true) {
        RedmineHelpdeskWidget.reload = true;
      }
      if (data['project_reload'] == true) {
        RedmineHelpdeskWidget.reload_project_data();
      }
    },false);
  },
  reload_form: function(){
    this.iframe.remove();
    this.create_iframe();
    this.fill_form();
    this.decorate_iframe();
    this.reload = false;
  },
  show: function() {
    this.iframe.style.display = 'block';
    this.positionate_iframe();
    switch (this.configuration['position']) {
      case 'topLeft':
      case 'topRight':
        this.widget_button.style.borderRadius = '50% 50% 0%';
        break;
      case 'bottomLeft':
      case 'bottomRight':
        this.widget_button.style.borderRadius = '100% 100%';
        break;
      default:
        this.widget_button.style.borderRadius = '100% 100%';
    }
    // this.widget_button.style.webkitTransform = 'rotate(45deg)';
    // this.widget_button.style.mozTransform = 'rotate(45deg)';
    // this.widget_button.style.msTransform = 'rotate(45deg)';
    // this.widget_button.style.oTransform = 'rotate(45deg)';
  },
  hide: function() {
    if (this.reload == true) {
      this.reload_form();
    }
    body = this.iframe.contentWindow.document.body;
    this.iframe.style.display = 'none';
    this.widget_button.style.borderRadius = '30px';
    this.widget_button.style.webkitTransform = '';
    this.widget_button.style.mozTransform = '';
    this.widget_button.style.msTransform = '';
    this.widget_button.style.oTransform = '';
  },
  toggle: function() {
    (this.iframe.style.display == 'block') ? this.hide() : this.show();
  }
}

RedmineHelpdeskWidget.load();
