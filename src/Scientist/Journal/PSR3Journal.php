<?php

namespace Scientist\Journals;

use Exception;
use NX\Scientist\Journal\PSR3Config;
use Psr\Log\LoggerInterface;
use Scientist\Report;
use Scientist\Experiment;
use Scientist\Result;

/**
 * Class PSR3Journal
 *
 * @package \Scientist\Journals
 */
class PSR3Journal implements Journal
{
    /**
     * The executed experiment.
     *
     * @var \Scientist\Experiment
     */
    protected $experiment;
    /**
     * The experiment report.
     *
     * @var \Scientist\Report
     */
    protected $report;
    /**
     * PSR3 Logger
     *
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
    /**
     * PSR3 Config
     *
     * @var \NX\Scientist\Journal\PSR3Config
     */
    protected $config;

    public function __construct(LoggerInterface $logger, PSR3Config $config)
    {
        $this->logger = $logger;
        $this->config = $config;
    }

    /**
     * Dispatch a report to storage.
     *
     * @param \Scientist\Experiment $experiment
     * @param \Scientist\Report     $report
     * @return mixed
     */
    public function report(Experiment $experiment, Report $report)
    {
        $this->experiment = $experiment;
        $this->report = $report;

        $results = $report->getTrials();

        if (isset($results['control'])) {
            throw new Exception('Please use a trial name other than "control"');
        }

        $results['control'] = $report->getControl();

        /** @var Result $result */
        foreach ($results as $key => $result) {
            $data_array = [
                $this->config->getIsMatchKey() => $result->isMatch(),
                $this->config->getStartTimeKey() => $result->getStartTime(),
                $this->config->getEndTimeKey() => $result->getEndTime(),
                $this->config->getTimeKey() => $result->getEndTime(),
                $this->config->getStartMemoryKey() => $result->getStartMemory(),
                $this->config->getEndMemoryKey() => $result->getEndMemory(),
                $this->config->getMemoryKey() => $result->getEndMemory()
            ];

            if ($this->config->shouldReportValue()) {
                $data_array[$this->config->getValueKey()] = $this->config->formatValue($result->getValue());
            }

            $this->logger->{$this->config->getLevel()}(
                $this->config->formatMessage($experiment, $report, $result, $key),
                $data_array
            );
        }
    }

    /**
     * Get the experiment.
     *
     * @return \Scientist\Experiment
     */
    public function getExperiment()
    {
        return $this->experiment;
    }

    /**
     * Get the experiment report.
     *
     * @return \Scientist\Report
     */
    public function getReport()
    {
        return $this->report;
    }
}