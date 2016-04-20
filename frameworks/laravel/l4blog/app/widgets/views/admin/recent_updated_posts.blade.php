<div class="col-sm-{{ $cols }}">
    <div class="panel panel-success">
        <div class="panel-heading">Recently updated posts</div>

        <table class="table">
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->format('H:m d-m-Y') }}</td>
                <td>
                    <div class="btn-group" role="group">
                      <a href="#" class="btn btn-success btn-xs">
                          <i class="glyphicon glyphicon-eye-open"></i>
                      </a>
                      <a href="#" class="btn btn-primary btn-xs">
                          <i class="glyphicon glyphicon-pencil"></i>
                      </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>