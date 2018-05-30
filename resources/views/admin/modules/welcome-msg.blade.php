<div class="box draggable resizable">
    <div class="box-header with-border">
        <h3 class="box-title">
            {{ Lang::get('modules.welcomeTitle') }}
        </h3>
        <div class="box-tools pull-right">
            {!! Form::button('<i class="fa fa-minus"></i>', array('class' => 'btn btn-box-tool','title' => 'Collapse', 'data-widget' => 'collapse', 'data-toggle' => 'tooltip')) !!}
            {!! Form::button('<i class="fa fa-times"></i>', array('class' => 'btn btn-box-tool','title' => 'close', 'data-widget' => 'remove', 'data-toggle' => 'tooltip')) !!}
        </div>
    </div>
    <div class="box-body">
        {{ Lang::get('modules.welcomeMessage',['username' => $user->name, 'levelaccess' => $access] ) }}
    </div>
</div>