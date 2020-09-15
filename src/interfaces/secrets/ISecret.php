<?php
namespace extas\interfaces\secrets;

use extas\interfaces\IDispatcherWrapper;
use extas\interfaces\IHasValue;
use extas\interfaces\IItem;
use extas\interfaces\samples\parameters\IHasSampleParameters;

/**
 * Interface ISecret
 *
 * @package extas\interfaces\secrets
 * @author jeyroik <jeyroik@gmail.com>
 */
interface ISecret extends IItem, IDispatcherWrapper, IHasSampleParameters, IHasValue
{
    public const SUBJECT = 'extas.secret';

    public const FLAG__ENCRYPT = 'enc';
    public const FLAG__DECRYPT = 'dec';
    public const FIELD__TARGET = 'target';

    /**
     * @return bool
     */
    public function encrypt(): bool;

    /**
     * @return bool
     */
    public function decrypt(): bool;

    /**
     * @return string
     */
    public function getTarget(): string;

    /**
     * @param string $target
     * @return $this
     */
    public function setTarget(string $target);
}
