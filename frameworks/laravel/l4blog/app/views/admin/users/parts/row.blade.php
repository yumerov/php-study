<tr>
    <td>{{ $id }}</td>
    <td>{{ $display_name }}</td>
    <td>{{ $created_at }}</td>
    <td>
        <div class="btn-group" role="group">
            <a href="{{ $hrefs->view }}" class="btn btn-success pull-left">
                <i class="glyphicon glyphicon-eye-open"></i>
            </a>
            <!-- <a href="{{ $hrefs->edit }}" class="btn btn-primary pull-left">
                <i class="glyphicon glyphicon-pencil"></i>
            </a> -->
            <!-- <button type="submit" class="btn btn-danger" form="delete-{{ $id }}">
                <i class="glyphicon glyphicon-trash"></i>
            </button> -->
        </div><!-- /.btn-group -->
        {{-- {{ Form::open($deleteForm) }} --}}
        {{-- {{ Form::close() }} --}}
    </td>
</tr>