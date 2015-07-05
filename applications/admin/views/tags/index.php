<div class="tags" ng-controller="tagsController">
    <table class="table table-hover table-responsive table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="item in data">
                <td> {{$index + 1}} </td>
                <td> {{item.name}} </td>
                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tagsModal" ng-click="edit($index)">Edit</button></td>
                <td><button type="button" class="btn btn-primary">Delete</button></td>
            </tr>

        </tbody>
    </table>
    
    <!--MODAL HERE-->
    <div id="tagsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add/Edit Tag</h4>
                </div>
                <div class="modal-body">
                    <form role="form" class="tags__form">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" ng-model="tagName" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Dictionary:</label>
                            <input type="text" class="form-control" value="menu" id="dictionary" disabled />
                        </div>
                        <button type="button" class="btn submit-btn btn-default">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
    </div>
</div>
