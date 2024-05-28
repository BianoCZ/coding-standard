<?php

namespace BianoCodingStandard\Sniffs\Commenting;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Util\Tokens;

class ForbiddenPhpstanIgnoreLineSniff implements Sniff
{

    /**
     * @inheritDoc
     */
    public function register()
    {
        return array_diff(Tokens::$commentTokens, Tokens::$phpcsCommentTokens);
    }

    /**
     * @inheritDoc
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $content = $tokens[$stackPtr]['content'];
        $matches = [];
        preg_match('/^(?:\A|[^\p{L}]+)((?:@)?phpstan-ignore(?:-next)?-line)([^\p{L}]+(.*)|\Z)$/ui', $content, $matches);
        if (empty($matches) === false) {
            $type        = 'CommentFound';
            $error       = sprintf(' Use of annotation %s is forbidden.', $matches[1]);

            $phpcsFile->addError($error, $stackPtr, $type);
        }

    }

}
