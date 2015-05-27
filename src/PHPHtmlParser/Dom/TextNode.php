<?php
namespace PHPHtmlParser\Dom;

class TextNode extends AbstractNode {
	
	/**
	 * This is a text node.
	 *
	 * @var Tag
	 */
	protected $tag;

	/**
	 * This is the text in this node.
	 *
	 * @var string
	 */
	protected $text;

	/**
	 * This is the converted version of the text.
	 *
	 * @var string
	 */
	protected $convertedText = null;

	/**
	 * Sets the text for this node.
	 *
	 * @param string $text
	 */
	public function __construct($text)
	{
		// remove double spaces
		$text = mb_ereg_replace('\s+', ' ', $text);

		$this->text = $text;
		$this->tag	= new Tag('text');
		parent::__construct();
	}

	/**
	 * Returns the text of this node.
	 *
	 * @return string
	 */
	public function text()
	{
		return $this->text;
	}

	/**
	 * This node has no html, just return the text.
	 *
	 * @return string
	 * @uses $this->text()
	 */
	public function innerHtml()
	{
		return $this->text();
	}

	/**
	 * This node has no html, just return the text.
	 *
	 * @return string
	 * @uses $this->text()
	 */
	public function outerHtml()
	{
		return $this->text();
	}

	/**
	 * Call this when something in the node tree has changed. Like a child has been added
	 * or a parent has been changed.
	 */
	protected function clear()
	{
		$this->convertedText = null;
	}
}