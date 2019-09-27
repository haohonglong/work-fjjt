<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
    <span style="float: left;">
        <ul class="breadcrumb"><li class="active">分类</li>
</ul>    </span>
                    <div class="ibox-tools">
                        <a class="collapse-link ui-sortable">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="mail-tools tooltip-demo m-t-md"><a class="btn btn-white btn-sm refresh"
                                                                   href="/category/refresh" title="刷新" data-pjax="0"><i
                                    class="fa fa-refresh"></i> 刷新</a> <a class="btn btn-white btn-sm"
                                                                         href="/admin/category/create" title="创建"
                                                                         data-pjax="0"><i class="fa fa-plus"></i> 创建</a>
                        <a class="btn btn-white btn-sm multi-operate" href="/category/delete" title="删除" data-pjax="0"
                           data-confirm="真的要删除吗？"><i class="fa fa-trash-o"></i> 删除</a></div>
                    <div id="w0" class="fixed-table-header" style="margin-right: 0px;">
                        <table class="table table-hover">
                            <colgroup>
                                <col>
                                <col>
                                <col>
                                <col>
                                <col class="sort" style="width:50px">
                                <col>
                                <col>
                                <col>
                            </colgroup>
                            <thead>
                            <tr>
                                <th width="10px"><span class="checkbox checkbox-success checkbox-inline"><input
                                                type="checkbox" id="inlineCheckbox5d8b2e31e87f11"
                                                class="select-on-check-all" name="selection_all" value="1"><label
                                                for="inlineCheckbox5d8b2e31e87f11"></label></span></th>
                                <th width="60px">PId</th>
                                <th width="60px">Id</th>
                                <th width="60px">名称</th>
                                <th class="action-column" width="100px">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($category as $item):?>
                            <tr class="odd" data-key="3">
                                <td><span class="checkbox checkbox-success checkbox-inline"><input type="checkbox"
                                                                                                   id="inlineCheckbox5d8b2e323fb743"
                                                                                                   name="selection[]"
                                                                                                   value="3"><label
                                                for="inlineCheckbox5d8b2e323fb743"></label></span></td>
                                <td style="word-wrap: break-word; word-break: break-all;"><?=$item['pid']?></td>
                                <td style="word-wrap: break-word; word-break: break-all;"><?=$item['id']?></td>
                                <td style="word-wrap: break-word; word-break: break-all;"><?=$item['name']?></td>

                                <td class="da-icon-column" style="width:100px;"><a class="btn-sm J_menuItem"
                                                                                   href="/admin/category/create"
                                                                                   title="创建" data-pjax="0"><i
                                                class="fa  fa-plus" aria-hidden="true"></i> </a> <a class="btn-sm"
                                                                                                    href="javascript:void(0)"
                                                                                                    title="查看"
                                                                                                    onclick="viewLayer('/category/view-layer?id=<?=$item['id']?>',$(this))"
                                                                                                    data-pjax="0"><i
                                                class="fa fa-folder"></i> </a> <a class="btn-sm"
                                                                                  href="/admin/category/edit?id=<?=$item['id']?>"
                                                                                  title="编辑" data-pjax="0"><i
                                                class="fa fa-edit"></i> </a> <a class="btn-sm"
                                                                                href="/admin/category/remove?id=<?=$item['id']?>" title="删除"
                                                                                data-confirm="确认要删除此项吗?"
                                                                                data-method="post" data-pjax="0"><i
                                                class="glyphicon glyphicon-trash" aria-hidden="true"></i> </a></td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-3" style="line-height: 567%">
                                <div class="summary">第<b>1-3</b>条，共<b>3</b>条数据.</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="dataTables_paginate paging_simple_numbers"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>