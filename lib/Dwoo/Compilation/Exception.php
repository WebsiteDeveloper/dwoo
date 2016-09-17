<?php
namespace Dwoo\Compilation;

use Dwoo\Exception as DwooException;
use Dwoo\Compiler as DwooCompiler;

/**
 * Dwoo compilation exception class.
 * This software is provided 'as-is', without any express or implied warranty.
 * In no event will the authors be held liable for any damages arising from the use of this software.
 *
 * @category  Library
 * @package   Dwoo\Compilation
 * @author    Jordi Boggiano <j.boggiano@seld.be>
 * @author    David Sanchez <david38sanchez@gmail.com>
 * @copyright 2008-2013 Jordi Boggiano
 * @copyright 2013-2016 David Sanchez
 * @license   http://dwoo.org/LICENSE Modified BSD License
 * @version   Release: 1.2.4
 * @date      2016-10-16
 * @link      http://dwoo.org/
 */
class Exception extends DwooException
{
    protected $compiler;
    protected $template;

    public function __construct(DwooCompiler $compiler, $message)
    {
        $this->compiler = $compiler;
        $this->template = $compiler->getDwoo()->getTemplate();
        parent::__construct('Compilation error at line ' . $compiler->getLine() . ' in "' . $this->template->getResourceName() . ':' . $this->template->getResourceIdentifier() . '" : ' . $message);
    }

    public function getCompiler()
    {
        return $this->compiler;
    }

    public function getTemplate()
    {
        return $this->template;
    }
}
