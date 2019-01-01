<?php
/**
 * Expressive plugin for Craft CMS 3.x
 *
 * Adds PHP preg functions as Twig filters.
 *
 * @link      https://www.theindigoviking.com
 * @copyright Copyright (c) 2018 The Indigo Viking
 */

namespace indigoviking\expressive\twigextensions;

use indigoviking\expressive\Expressive;

use Craft;

/**
 * @author    The Indigo Viking
 * @package   Expressive
 * @since     1
 */
class ExpressiveTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Expressive';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('preg_filter', [$this, 'pregfilter']),
            new \Twig_SimpleFilter('preg_grep', [$this, 'preggrep']),
            new \Twig_SimpleFilter('preg_last_error', [$this, 'preglasterror']),
            new \Twig_SimpleFilter('preg_match', [$this, 'pregmatch']),
            new \Twig_SimpleFilter('preg_match_first', [$this, 'pregmatchfirst']),
            new \Twig_SimpleFilter('preg_match_all', [$this, 'pregmatchall']),
            new \Twig_SimpleFilter('preg_quote', [$this, 'pregquote']),
            new \Twig_SimpleFilter('preg_replace', [$this, 'pregreplace']),
            new \Twig_SimpleFilter('preg_replace_callback', [$this, 'pregreplacecallback']),
            new \Twig_SimpleFilter('preg_replace_callback_array', [$this, 'pregreplacecallbackarray']),
            new \Twig_SimpleFilter('preg_split', [$this, 'pregsplit']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('preg_filter', [$this, 'pregfilter']),
            new \Twig_SimpleFunction('preg_grep', [$this, 'preggrep']),
            new \Twig_SimpleFunction('preg_last_error', [$this, 'preglasterror']),
            new \Twig_SimpleFunction('preg_match', [$this, 'pregmatch']),
            new \Twig_SimpleFunction('preg_match_first', [$this, 'pregmatchfirst']),
			new \Twig_SimpleFunction('preg_match_all', [$this, 'pregmatchall']),
			new \Twig_SimpleFunction('preg_quote', [$this, 'pregquote']),
			new \Twig_SimpleFunction('preg_replace', [$this, 'pregreplace']),
			new \Twig_SimpleFunction('preg_replace_callback', [$this, 'pregreplacecallback']),
			new \Twig_SimpleFunction('preg_replace_callback_array', [$this, 'pregreplacecallbackarray']),
			new \Twig_SimpleFunction('preg_split', [$this, 'pregsplit']),
        ];
    }

    /**
     * @param null $text
     *
     * @return string
     */
    public function pregfilter($content, $pattern, $replacement='', $limit=-1)
    {
        if (!isset($content)) {
			return null;
		}
		else {
			return preg_filter($pattern, $replacement, $content, $limit);
		}
    }
    
    public function preggrep($content, $pattern)
    {
        if (!isset($content)) {
			return null;
		}
		else {
			return preg_grep($pattern, $content);
		}
    }

    public function preglasterror($content, $funtype='filter', $param1='', $param2='', $param3 ='')
    {
	    
        if (!isset($content)) {
			return null;
		}
		else {
			switch ($funtype) {
				
				case "filter":
					if ($param3 == "") {
						$test = preg_filter($param1, $param2, $content, $param3);
					}
					else {
						$test = preg_filter($param1, $param2, $content);
					}
					break;
				
				case "grep":
					$test = preg_grep($param1, $content);
					break;
				
				case "match":
					$test = preg_match($param1, $content);
					break;
					
				case "matchfirst":
					$matches = array();
					$test = preg_match($param1, $content, $matches);
					break;
					
				case "matchall":
					$test = preg_match_all($param1, $content);
					break;
					
				case "quote":
					$test = preg_quote($content, $param1);
					break;
					
				case "replace":
					if ($param3 == "") {
						$test = preg_replace($param1, $param2, $content);
					}
					else {
						$test = preg_replace($param1, $param2, $content, $param3);
					}
					break;
					
				case "callback":
					$test = preg_replace_callback($param1, $param2, $content);
					break;
					
				case "callbackarray":
					if ($param3 == "") {
						$test = preg_replace_callback_array($param1, $content, $param2);
					}
					else {
						$test = preg_replace_callback_array($param1, $content, $param3, $param3);
					}
					break;
					
				case "split":
					$test = preg_split($param1, $content);
					break;
			}
			
			return preg_last_error();
		}
    }

    public function pregmatch($content, $pattern)
    {
        if (!isset($content)) {
			return null;
		}
		else {
			return preg_match($pattern, $content);
		}
    }

    public function pregmatchfirst($content, $pattern)
    {
        if (!isset($content)) {
			return null;
		}
		else {
			$matches = array();

			preg_match($pattern, $content, $matches);
			if (!empty($matches[0])) {
				return $matches[0];
			} else {
				return null;
			}
		}
    }

    public function pregmatchall($content, $pattern)
    {
	    if (!isset($content)) {
			return null;
		}
		else {
			return preg_match_all($pattern, $content);
		}
    }

    public function pregquote($content, $delimiter=NULL)
    {
        if (!isset($content)) {
			return null;
		}
		else {
			return preg_quote($content, $delimiter);
		}
    }
    
    public function pregreplace($content, $pattern, $replacement='', $limit=-1)
    {
        if (!isset($content)) {
			return null;
		}
		else {
			return preg_replace($pattern, $replacement, $content, $limit);
		}
    }
    
    public function pregreplacecallback($content, $pattern, $callback)
    {
	    if (!isset($content)) {
			return null;
		}
		else {
			return preg_replace_callback($pattern, $callback, $content);
		}
    }

    public function pregreplacecallbackarray($content, $pattern, $limit = -1, $count = NULL)
    {
	    if (!isset($content)) {
			return null;
		}
		else {
			if (!isset($count)) {
				return preg_replace_callback_array($pattern, $content, $limit);
			}
			else {
				return preg_replace_callback_array($pattern, $content, $limit, $count);
			}
		}
    }

    public function pregsplit($content, $pattern)
    {
        if (!isset($content)) {
			return null;
		}
		else {
			return preg_split($pattern, $content);
		}
    }
}
