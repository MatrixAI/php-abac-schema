php-abac-schema
====================

The schema is primitive but it's the closest we can get to Haskell style algebraic data types and record types. Dealing with connascence is done by lifting interface enforcement to compile time or at higher stages at run time.

In the future a macro generator can make schemas more easily created and if there was a way to automatically translate JSON schema to this kind of schema, it would be even cross platform.

Magic strings are used whenever there's no compiler/automatic tool to enforce interfaces across disparate parts of a distributed system.

Flesh out example of Prolog authorisation enforcement. This requires fixing Prolog autoloader.

Nested attributes should also be a class that extends AbstractAttributes, the same construction method can be used for all.

Furthermore the schema in PHP here is inherently Maybe. So every attribute is optional. However in a more sophisticated type system, one must be able to say that particular properties are required. The only way to do this right now is to override the constructor and check that a particular property is passed in the array.

The type of policy passed into a controller shouldn't be just be the class type of the policy, but should really be `Policy<AuthAttributes>`, that is a policy object parameterised by the attributes that it understands. The attributes represent a language that the controller speaks and emits. While the policy needs to be able to understand this language. So we abstract out the language as an interface (implemented as a final class extending `AbstractAttributes`) and have both the controller and the policy depend on it. However we do not have generics (parametric polymorphism) in PHP, so we are stuck just using an policy class as the type hint.

Another issue is that for the policy to understand the language, it is more than just the interface keys, but also understand the value of the keys. For many things, it can just be a true or false. But one important attribute is `ACTION_PATH`, here being the absolute namespaced path to the class and function where the controller is requesting whether to access the resource or not. Therefore the policy needs to know what kind of action is being requested here, and under MAC considerations, this mean the policy needs to know about all the relevant controllers. This means we use a constant inside the controller to represent the action path for a particular function, so that the policy can also call into the controller to acquire the relevant paths. It is possible to instead use magic strings here, but we want to avoid doing this, so instead we use more stronger notions of magic strings, that is terms that can be checked by a static analysis tool, that being of the namespaced scope operator `::`. Note that if you extend a controller in order to replace it, you must also redefine all the access constants if you also replace the function. This is because each of the access constants refer to `self`.

Under the examples launch `vendor/bin/psysh`:

```php
$u = new ABACExamples\UserController(new ABACExamples\UserAuthPolicy);
$u->testAccess();
```

The above code only works on PHP 7.1, but the same principle can be done on older PHP versions.
