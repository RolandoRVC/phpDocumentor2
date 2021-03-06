<?php
declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Mike van Riel <mike.vanriel@naenius.com>
 * @copyright 2010-2018 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Transformer\Behaviour;

use phpDocumentor\Descriptor\ProjectDescriptor;
use phpDocumentor\Transformer\Transformer;

/**
 * Collection object for a set of Behaviours.
 */
abstract class BehaviourAbstract
{
    /**
     * @var Transformer The base transformer object from which the transformation parameters can
     *   be retrieved.
     */
    protected $transformer = null;

    /**
     * Executes the behaviour on the given dataset,
     *
     * @param ProjectDescriptor $project document containing the source structure.
     *
     * @return ProjectDescriptor
     */
    abstract public function process(ProjectDescriptor $project);

    /**
     * Sets the transformer used for this behaviour.
     *
     * @param Transformer $transformer Transformer responsible for output.
     */
    public function setTransformer(Transformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Returns the transformer that hosts this behaviour.
     *
     * @return Transformer
     */
    public function getTransformer()
    {
        return $this->transformer;
    }
}
