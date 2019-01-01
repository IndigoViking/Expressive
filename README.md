# Expressive plugin for Craft CMS 3.x

Adds PHP preg functions as Twig filters.

![Screenshot](resources/img/plugin-logo.png)

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, search for Expressive in the Plugin Store or follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require IndigoViking/expressive

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Expressive.

## Expressive Overview

Adds PHP preg functions as Twig filters.
[preg_filter](http://php.net/manual/en/function.preg-filter.php)

[preg_grep](http://php.net/manual/en/function.preg-grep.php)

[preg_last_error](http://php.net/manual/en/function.preg-last-error.php)

[preg_match](http://php.net/manual/en/function.preg-match.php)

preg_match_first

[preg_match_all](http://php.net/manual/en/function.preg-match-all.php)

[preg_quote](http://php.net/manual/en/function.preg-quote.php)

[preg_replace](http://php.net/manual/en/function.preg-replace.php)

[preg_replace_callback](http://php.net/manual/en/function.preg-replace-callback.php)

[preg_replace_callback_array](http://php.net/manual/en/function.preg-replace-callback-array.php)

[preg_split](http://php.net/manual/en/function.preg-split.php)

## Using Expressive

Twig will remove backslashes so double backslash your regex patterns.

### Filter
`{{ entry.field|preg_filter(pattern, replacement, limit) }}`

### Grep
`{{ entry.field|preg_grep(pattern) }}`

### Last Error
This filter returns the last error given on any preg function. The preg function to test with must be specified and the appropriate parameters needed for that function to work.

#### Testing preg_filter
`{{ entry.field|preg_last_error('filter', pattern, replacement, limit) }}`
#### Testing preg_grep
`{{ entry.field|preg_last_error('grep', pattern) }}`
#### Testing preg_match
`{{ entry.field|preg_last_error('match', pattern) }}`
#### Testing preg_match_first
`{{ entry.field|preg_last_error('matchfirst', pattern) }}`
#### Testing preg_match_all
`{{ entry.field|preg_last_error('matchall', pattern) }}`
#### Testing preg_quote
`{{ entry.field|preg_last_error('quote', delimiter) }}`
#### Testing preg_replace
`{{ entry.field|preg_last_error('replace', pattern, replacement, limit) }}`
#### Testing preg_replace_callback
`{{ entry.field|preg_last_error('callback', pattern, callback) }}`
#### Testing preg_replace_callback_array
`{{ entry.field|preg_last_error('callbackarray', pattern, limit, count) }}`
#### Testing preg_split
`{{ entry.field|preg_last_error('split', pattern) }}`

### Match
`{{ entry.field|preg_match(pattern) }}`

### Match First
`{{ entry.field|preg_match_first(pattern) }}`

### Match All
`{{ entry.field|preg_match_all(pattern) }}`

### Quote
`{{ entry.field|preg_quote(delimiter) }}`

### Replace
`{{ entry.field|preg_replace(pattern, replacement, limit) }}`
Example: Replace email addresses with mailto links:
`{{ entry.field|preg_replace('/(\S+@\S+\.\S+)/', '<a href=mailto:"$1">$1</a>')|raw }}`
Adding the |raw filter will render the HTML.

### Replace Callback
`{{ entry.field|preg_replace_callback(pattern, callback) }}`

### Replace Callback Array
`{{ entry.field|preg_replace_callback_array(pattern, limit, count) }}`

### Split
`{{ entry.field|preg_split(pattern) }}`

Brought to you by [The Indigo Viking](https://www.theindigoviking.com)
