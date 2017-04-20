<?php

use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext
{
    /**
     * @Given I wait for :arg1 seconds
     */
    public function iWaitForSeconds($arg1)
    {
        $this->getSession()->wait($arg1 * 1000);
    }

    /**
     * @Given I click on :arg1
     */
    public function iClickOn($arg1)
    {
        $page = $this->getSession()->getPage();
        $el = $page->find('named', ['content', $arg1]);
        $el->click();
    }

}
