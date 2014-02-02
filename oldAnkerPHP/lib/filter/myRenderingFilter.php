<?php

class myRenderingFilter extends sfFilter {

    /**
     * Executes this filter.
     *
     * @param sfFilterChain The filter chain.
     *
     * @throws <b>sfInitializeException</b> If an error occurs during view initialization
     * @throws <b>sfViewException</b>       If an error occurs while executing the view
     */
    public function execute($filterChain) {

        // execute next filter
        $filterChain->execute();

        if (!$this->isFirstCall())
            return;

        if (sfConfig::get('sf_logging_enabled')) {
            $this->getContext()->getLogger()->info('{sfFilter} render to client');
        }

        // get response object
        $response = $this->getContext()->getResponse();

        // send headers
        if (method_exists($response, 'sendHttpHeaders')) {
            $response->sendHttpHeaders();
        }

        // send content
        $response->sendContent();

        // log timers information
        if (sfConfig::get('sf_debug') && sfConfig::get('sf_logging_enabled')) {
            $logger = $this->getContext()->getLogger();
            foreach (sfTimerManager::getTimers() as $name => $timer) {
                $logger->info(sprintf('{sfTimerManager} %s %.2f ms (%d)', $name, $timer->getElapsedTime() * 1000, $timer->getCalls()));
            }
        }
    }

}