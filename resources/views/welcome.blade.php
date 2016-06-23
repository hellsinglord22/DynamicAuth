<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>Welcome Dude</h1>

                @can('edit-forum')
                    <a href="#">edit-forum</a>
                @endcan


                @can('change-balance')
                   <a href="#">change-balance</a> 
                @endcan
            </div>
        </div>
    </body>
</html>
