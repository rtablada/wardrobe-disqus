<?php namespace Rtablada\WardrobeDisqus;

use Illuminate\Config\Repository as Config;

class WardrobeDisqus
{
	protected $config;

	public function __construct(Config $config)
	{
		$this->config = $config;
	}

	public function comments()
	{
		$disqus_shortname = $this->config->get('wardrobe-disqus::disqus_shortname');

		return
			"<div id=\"disqus_thread\"></div>\n" .
			"<script type=\"text/javascript\">\n\t" .
			"var disqus_shortname = '{$disqus_shortname}';\n\t" .
			"(function() {\n\t\t" .
			"var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;\n\t\t" .
			"dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';\n\t\t" .
			"(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);\n\t" .
			"})();\n</script>\n" .
			"<noscript>Please enable JavaScript to view the <a href=\"http://disqus.com/?ref_noscript\">comments powered by Disqus.</a></noscript>\n" .
			"<a href=\"http://disqus.com\" class=\"dsq-brlink\">comments powered by <span class=\"logo-disqus\">Disqus</span></a>\n";
	}
}
