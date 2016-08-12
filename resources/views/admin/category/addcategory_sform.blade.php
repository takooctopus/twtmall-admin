<div class="container">

    <!-- 模态框（Modal） -->
    <div class="modal fade" id="addCategory_sModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Create A New Category_s
                    </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="addcatgory_sform">
                        <div class="form-group bg-warning">
                            <label for="category_s_id" class="col-sm-2 col-sm-offset-2 control-label">Category_s_id</label>
                            <div class="col-sm-6">
                                <input id="category_s_id" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group bg-success">
                            <label for="category_s_name" class="col-sm-2 col-sm-offset-2 control-label">category_s_name</label>
                            <div class="col-sm-6">
                                <input id="category_s_name" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group bg-info">
                            <label for="b_id" class="col-sm-2 col-sm-offset-2 control-label">b_id</label>
                            <div class="col-sm-6">
                                <input id="b_id" class="form-control" placeholder="" disabled="disabled" value={{$category_s_id}} >
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary" id="addcategory_sbutton">
                        增加
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>



</div>