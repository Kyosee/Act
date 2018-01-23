<?php
use App\Models\Project;
use App\Models\ProjectTemplate;

return [
    // 页面标题
    'title'   => '应用模板管理',

    // 模型单数，用作页面『新建 $single』
    'single'  => '应用模板',

    // 数据模型，用作数据的 CRUD
    'model'   => ProjectTemplate::class,

    // 设置当前页面的访问权限，通过返回布尔值来控制权限。
    // 返回 True 即通过权限验证，False 则无权访问并从 Menu 中隐藏
    'permission'=> function()
    {
        return Auth::user()->can('manage_users');
    },

    // 字段负责渲染『数据表格』，由无数的『列』组成，
    'columns' => [

        // 列的标示，这是一个最小化『列』信息配置的例子，读取的是模型里对应
        // 的属性的值，如 $model->id
        'id',

        'avatar' => [
            // 数据表格里列的名称，默认会使用『列标识』
            'title'  => '头像',

            // 默认情况下会直接输出数据，你也可以使用 output 选项来定制输出内容
            'output' => function ($avatar, $model) {
                return empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" width="40">';
            },

            // 是否允许排序
            'sortable' => false,
        ],

        'template_name' => [
            'title'    => '模板名称',
        ],

        'template_desc' => [
            'title' => '模板描述',
            'type' =>'textarea'
        ],

        'template_folder' => [
            'title' => '模板所属文件夹',
        ],
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],

    // 『模型表单』设置项
    'edit_fields' => [
        'template_name' => [
            'title'    => '模板名称',
        ],

        'template_desc' => [
            'title' => '模板描述',
            'type' =>'textarea'
        ],

        'template_folder' => [
            'title' => '模板所属文件夹',
        ],
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],

    // 『数据过滤』设置
    'filters' => [
        'id' => [

            // 过滤表单条目显示名称
            'title' => '模板 ID',
        ],
        'nickname' => [
            'title' => '模板名称',
        ],
    ],
];
