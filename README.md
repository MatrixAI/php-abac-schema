php-abac-schema
====================

Because PHP has no generics, and also due to LSP violation. We cannot currently have an interface or abstract class for policies. If we could, we could express something like:

```php
interface PolicyInterface<T is AbstractAttributes> {
  public function allow (T $attributes, ?bool $default): array;
}

class AuthAttributes extends AbstractAttributes {
  //...
}

class AuthPolicy implements PolicyInterface<AuthAttributes> {
  public function allow (AuthAttributes $attributes, ?bool $default = false): array {
    //...
    return [$default, null];
  }
}

function accessControl ($user, $resource, PolicyInterface<AuthAttributes> $oracle) {
  if (
    $oracle->allow(new AuthAttributes([
      AuthAttributes::USER_ID => $user,
      AuthAttributes::RESOURCE_ID => $resource
    ]))
  ) {
    return 'allowed';
  } else {
    return 'disallowed';
  }
}
```

Until PHP has generics, the above is not possible, and instead we rely on duck typing for using different policy objects.

Vote yes for generics! https://wiki.php.net/rfc/generics

Because of the lack of symbols and atoms in PHP, we use constants with the same name as values. This allows use to use reflection to guarantee that the names must exist as part of the schema.

```php
class AuthAttributes extends AbstractAttributes {

  const USER_ID = 'USER_ID';
  const ACTION_ID = 'ACTION_ID';
  const RESOURCE_ID = 'RESOURCE_ID';
  const CLASS_PATH = 'CLASS_PATH';

}
```

The lack of tuple types means we just have to use `array` instead of a tuple like `(?bool, string)`. For the return type of the `allow` function.

---

The example of using prolog is not finished. However the abstract attributes is ready.

---

Schema is still really primitive, it's only useful for enforcing top-level keys, and there's really no enforcement on what kind of values may exist within those keys, nor is there an easy support for nested attributes. Of course that's not to say you cannot pass nested attributes, just that there's no enforcement and no prevention of connascence through type information and a prevention of meta-coupling or coupling at low cohesion using enforce correct by construction attributes, and that the attributes themselves acts like an interface that both the construction of an attribute set and the policy that applies will depend on. So in the future, more sophisticated interfaces should be possible with algebraic data types, json schema, xacml.. and so on. Also further development of policy examples that uses prolog or dynamic prolog expressions through subject predicate object rdf graphs. Serialised prolog expressions through RDF. At some point your authorisation rules will need to be turing complete, and at that point the tool needed is a programming language.

1. Investigate Prolog
2. Investigate JSON Schema and other ADT possibilities
3. Apply PHP generics when possible
4. Better error and success reporting via the error messages
5. Most importantly is that any kind of attribute creation needs enough typing information such that it can be checked at compile time, compile time connascence errors is better than runtime connascence errors. This is why we're not just using a standard validation system.
6. If the policy require some serialised form of attributes that should be implemented by the attribute object extending AbstractAttributes.
7. What we really need is record types of some sort
8. Optional and needed parameters as well
