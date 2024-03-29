# 2.2.1

- Fixed `extas.storage.php` .

# 2.2.0

- Added extension `IExtensionSecretWithKey`. It is providing methods:
  - `withKey(string $key): ISecret`: added param `IExtensionSecretWithKey::PARAM__KEY` to a secret.
  - `getKey(): string`: return key value, return `''` if key param is missed.

# 2.1.0

- Added extension `IExtensionSecretWithPassword`. It is providing methods:
  - `withPassword(string $password): ISecret`: added param `IExtensionSecretWithPassword::PARAM__PASSWORD` to a secret.
  - `getPassword(): string`: return password value, return `''` if password param is missed.

# 2.0.0

- Updated package to `extas-foundation v6`.
- Removed `ISecret::FIELD__TARGET`.
- Added `ISecret::FIELD__ID`.
- `ISecret` extends `extas\interfaces\parameters\IHaveParams` instead of `extas\interfaces\samples\parameters\IHasSampleParameters` now.
- Added enum `ESecretFlag` instead of consts `ISecret::FLAG__ENCRYPT`, `ISecret::FLAG__DECRYPT`.
- Added `Base64SecretResolver` as basic secret resolver.

# 1.0.0

- Secret methods `ecrypt` and `decrypt` added. You shoud use them instead of `resolve` in the previous version.
- Invoking secret resolving got additional argument - flag, which can be `enc` or `dec` for encryption and decryption respectively.

# 0.1.0

- Secret model added.
- Secret resolver interface added.