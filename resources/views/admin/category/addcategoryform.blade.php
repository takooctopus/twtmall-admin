<div class="container">

    <!-- 模态框（Modal） -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Create A New Category
                    </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="addcatgoryform">
                        <div class="form-group bg-warning">
                            <label for="category_id" class="col-sm-2 col-sm-offset-2 control-label">Category_id</label>
                            <div class="col-sm-6">
                                <input id="category_id" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group bg-success">
                            <label for="category_name" class="col-sm-2 col-sm-offset-2 control-label">category_name</label>
                            <div class="col-sm-6">
                                <input id="category_name" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group bg-info">
                            <label for="category_class" class="col-sm-2 col-sm-offset-2 control-label">Category_class</label>
                            <div class="col-sm-6">
                                <input id="category_class" class="form-control" placeholder="">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary" id="addcategorybutton">
                        增加
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>



</div>