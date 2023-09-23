@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" id="flash_messsage">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong class="text-dark">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block" id="flash_messsage">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong class="text-dark">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block" id="flash_messsage">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong class="text-dark">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block" id="flash_messsage">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong class="text-dark">{{ $message }}</strong>
</div>
@endif
