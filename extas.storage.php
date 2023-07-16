<?php

use extas\components\repositories\RepoItem;

return [
  "name" => "jeyroik/extas-secrets",
  "tables" => [
    "secrets" => [
      "namespace" => "extas\\repositories",
      "item_class" => "extas\\components\\secrets\\Secret",
      "pk" => "id",
      "aliases" => [],
      "hooks" => [],
      "code" => [
          'create-before' => '\\' . RepoItem::class . '::setId($item);'
                            .'\\' . RepoItem::class . '::throwIfExist($this, $item, [\'name\']);'
      ]
    ]
  ]
];
