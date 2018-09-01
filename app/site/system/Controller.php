<?php
/**
 * Site base controller
 * @package site
 * @version 0.0.1
 */

namespace Site;

class Controller extends \Mim\Controller
    implements \Mim\Iface\GateController
{
    public function show404(): void{

    }

    public function show404Action(): void{

    }

    public function show500(object $error): void{
        $tx = $error->text;
        $tx.= '<br>';
        $tx.= 'File: ' . $error->file . ' (' . $error->line . ')';
        if(isset($error->trace)){
            $tx.= '<ul>';
            foreach($error->trace as $trace){
                if(!isset($trace['file']))
                    continue;
                $tx.= '<li>' . $trace['file'] . '(' . $trace['line'] . ')' . '</li>';
            }
            $tx.= '</ul>';
        }

        $this->res->addContent($tx);
        $this->res->send();
    }

    public function show500Action(): void{
        $this->show500(\Mim\Library\Logger::$last_error);
    }
}