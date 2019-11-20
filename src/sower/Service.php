<?php declare (strict_types = 1);
#coding: utf-8
# +-------------------------------------------------------------------
# | 系统服务基础类
# +-------------------------------------------------------------------
# | Copyright (c) 2017-2019 Sower rights reserved.
# +-------------------------------------------------------------------
# +-------------------------------------------------------------------
namespace sower;
abstract class Service
{
    protected $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    /**
     * 加载路由
     * @access protected
     * @param string $path 路由路径
     */
    protected function loadRoutesFrom($path)
    {
        require $path;
    }

    /**
     * 添加指令
     * @access protected
     * @param array|string $commands 指令
     */
    protected function commands($commands)
    {
        $commands = is_array($commands) ? $commands : func_get_args();

        Console::starting(function (Console $console) use ($commands) {
            $console->addCommands($commands);
        });
    }
}
