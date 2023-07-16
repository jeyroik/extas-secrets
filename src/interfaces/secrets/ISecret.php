<?php
namespace extas\interfaces\secrets;

use extas\interfaces\IDispatcherWrapper;
use extas\interfaces\IHasValue;
use extas\interfaces\IHaveUUID;
use extas\interfaces\IItem;
use extas\interfaces\parameters\IHaveParams;

/**
 * Interface ISecret
 *
 * @package extas\interfaces\secrets
 * @author jeyroik <jeyroik@gmail.com>
 */
interface ISecret extends IItem, IHaveUUID, IDispatcherWrapper, IHaveParams, IHasValue
{
    public const SUBJECT = 'extas.secret';

    /**
     * @return bool
     */
    public function encrypt(): bool;

    /**
     * @return bool
     */
    public function decrypt(): bool;
}
