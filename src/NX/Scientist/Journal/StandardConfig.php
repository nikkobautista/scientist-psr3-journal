<?php
namespace NX\Scientist\Journal;

use Psr\Log\LogLevel;
use Scientist\Experiment;
use Scientist\Report;
use Scientist\Result;

class StandardConfig implements PSR3Config
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
    public function getLevel()
    {
        return LogLevel::INFO;
    }

    /**
     * Return true if the we should report the value
     *
     * @return boolean
     */
    public function shouldReportValue()
    {
        return true;
    }

    /**
     * Return the value key to be used
     *
     * @return string
     */
    public function getValueKey()
    {
        return 'value';
    }

    /**
     * Return the is match key to be used
     *
     * @return string
     */
    public function getIsMatchKey()
    {
        return 'is_match';
    }

    /**
     * Return the start time key to be used
     *
     * @return string
     */
    public function getStartTimeKey()
    {
        return 'start_time';
    }

    /**
     * Return the end time key to be used
     *
     * @return string
     */
    public function getEndTimeKey()
    {
        return 'end_time';
    }

    /**
     * Return the time key to be used
     *
     * @return string
     */
    public function getTimeKey()
    {
        return 'time';
    }

    /**
     * Return the start memory key to be used
     *
     * @return string
     */
    public function getStartMemoryKey()
    {
        return 'start_memory';
    }

    /**
     * Return the end memory key to be used
     *
     * @return string
     */public function getEndMemoryKey()
    {
        return 'end_memory';
    }

    /**
     * Return the memory key to be used
     *
     * @return string
     */
    public function getMemoryKey()
    {
        return 'memory';
    }

    /**
     * Format the message to be used
     *
     * @param Experiment $experiment
     * @param Report     $report
     * @param Result     $result
     * @param string     $result_key
     *
     * @return string
     */
    public function formatMessage(Experiment $experiment, Report $report, Result $result, $result_key)
    {
        return "{$report->getName()}: {$result_key}";
    }

    /**
     * Format how the value will be presented
     *
     * @param mixed $value
     * @return string
     */
    public function formatValue($value)
    {
        return var_export($value, true);
    }
}