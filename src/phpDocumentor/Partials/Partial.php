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

namespace phpDocumentor\Partials;

use JMS\Serializer\Annotation as Serializer;

class Partial
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $content;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $link;

    /** @var \Parsedown $parser */
    protected $parser = null;

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $content Set the content for tests
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @param string $link Set the link for tests
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @param string $name Set the name for tests
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Constructs a new collection object.
     *
     * @param \Parsedown $parser
     */
    public function setParser($parser)
    {
        $this->parser = $parser;
    }

    /**
     * Renders the partial to a string.
     *
     * @return string
     */
    public function __toString()
    {
        $content = '';
        if ($this->getContent()) {
            $content = $this->getContent();
        } elseif ($this->getLink()) {
            if (! is_readable($this->getLink())) {
                // Handled in ServiceProvider.
                return '';
            }

            $content = file_get_contents($this->getLink());
        }
        return $this->parser->text($content);
    }
}
