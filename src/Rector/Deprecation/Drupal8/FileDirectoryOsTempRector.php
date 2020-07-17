<?php

namespace DrupalRector\Rector\Deprecation\Drupal8;

use DrupalRector\Rector\Deprecation\Base\FunctionToStatic;
use Rector\Core\RectorDefinition\CodeSample;
use Rector\Core\RectorDefinition\RectorDefinition;

/**
 * Replaces deprecated file_directory_temp() calls.
 *
 * See https://www.drupal.org/node/2802569 for change record.
 *
 * What is covered:
 * - Static replacement
 */
final class FileDirectoryOsTempRector extends FunctionToStatic
{
    protected $deprecatedFunctionName = 'file_directory_os_temp';

    protected $className = 'Drupal\Component\FileSystem\FileSystem';

    protected $methodName = 'getOsTemporaryDirectory';

    /**
     * @inheritdoc
     */
    public function getDefinition(): RectorDefinition
    {
        return new RectorDefinition('Fixes deprecated file_directory_temp() calls',[
            new CodeSample(
                <<<'CODE_BEFORE'
$dir = file_directory_os_temp();
CODE_BEFORE
                ,
                <<<'CODE_AFTER'
$dir = \Drupal\Component\FileSystem\FileSystem::getOsTemporaryDirectory();
CODE_AFTER
            )
        ]);
    }


}