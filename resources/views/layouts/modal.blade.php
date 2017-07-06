<div class="modal fade" id="@yield('id')" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Warning</h4>
            </div>
            <div class="modal-body">
                <h4>@yield('message')</h4>
            </div>
            <div class="modal-footer">
                @yield('buttons')
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            @yield('other')
        </div>
    </div>
</div>