<?php

namespace App\Controllers;

use Silex\Application;

class RelationshipsController
{
    /**
     * Render welcome view.
     *
     * @param &nbsp;Application $app Silex\Application
     *
     */
    public function Index(Application $app)
    {
        $render = "<strong>Welcome!</strong></br></br>";

        return $render;
    }
}