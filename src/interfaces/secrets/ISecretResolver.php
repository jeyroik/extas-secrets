<?php
namespace extas\interfaces\secrets;

use extas\components\secrets\ESecretFlag;
use extas\interfaces\IItem;

/**
 * Interface ISecretResolver
 *
 * @package extas\interfaces\secrets
 * @author jeyroik <jeyroik@gmail.com>
 */
interface ISecretResolver extends IItem
{
    public const SUBJECT = 'extas.secret.resolver';

    /**
     * @param ISecret $secret
     * @param ESecretFlag $flag
     * @return bool
     */
    public function __invoke(ISecret &$secret, ESecretFlag $flag): bool;
}
