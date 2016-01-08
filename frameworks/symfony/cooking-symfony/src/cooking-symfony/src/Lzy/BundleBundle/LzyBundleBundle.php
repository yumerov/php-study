<?php

namespace Lzy\BundleBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LzyBundleBundle extends Bundle
{
	const PARENT = 'LzyAsseticBundle';

	/**
	 * @return string
	 */
	public function getParent() 
	{
		return self::PARENT;
	}
}
