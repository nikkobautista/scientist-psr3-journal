<?php
namespace NX\Scientist\Journal;

use Scientist\Experiment;
use Scientist\Report;
use Scientist\Result;

interface PSR3Config
{
    /**
     * Get the default log level
     *
     * @return \Psr\Log\LogLevel::EMERGENCY
     * @return \Psr\Log\LogLevel::ALERT
     * @return \Psr\Log\LogLevel::CRITICAL
     * @return \Psr\Log\LogLevel::ERROR
     * @return \Psr\Log\LogLevel::WARNING
     * @return \Psr\Log\LogLevel::NOTICE
     * @return \Psr\Log\LogLevel::INFO
     * @return \Psr\Log\LogLevel::DEBUG
     */
    public function getLevel();

    /**
     * Return true if the we should report the value
     *
     * @return boolean
     */
    public function shouldReportValue();

    /**
     * Return the value key to be used
     *
     * @return string
     */
    public function getValueKey();

    /**
     * Return the is match key to be used
     *
     * @return string
     */
    public function getIsMatchKey();

    /**
     * Return the start time key to be used
     *
     * @return string
     */
    public function getStartTimeKey();

    /**
     * Return the end time key to be used
     *
     * @return string
     */
    public function getEndTimeKey();

    /**
     * Return the time key to be used
     *
     * @return string
     */
    public function getTimeKey();

    /**
     * Return the start memory key to be used
     *
     * @return string
     */
    public function getStartMemoryKey();

    /**
     * Return the end memory key to be used
     *
     * @return string
     */
    public function getEndMemoryKey();

    /**
     * Return the memory key to be used
     *
     * @return string
     */
    public function getMemoryKey();

    /**
     * Format the message to be used
     *
     * @param Experiment $experiment
     * @param Report     $report
     * @param Result     $result
     *
     * @return string
     */
    public function formatMessage(Experiment $experiment, Report $report, Result $result);

    /**
     * Format how the value will be presented
     *
     * @param mixed $value
     *
     * @return string
     */
    public function formatValue($value);
}