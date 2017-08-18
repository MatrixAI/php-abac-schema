php-abac-schema
====================

The schema is primitive but it's the closest we can get to Haskell style algebraic data types and record types. Dealing with connascence is done by lifting interface enforcement to compile time or at higher stages at run time.

In the future a macro generator can make schemas more easily created and if there was a way to automatically translate JSON schema to this kind of schema, it would be even cross platform.

Magic strings are used whenever there's no compiler/automatic tool to enforce interfaces across disparate parts of a distributed system.

Flesh out example of Prolog authorisation enforcement. This requires fixing Prolog autoloader.

Nested attributes should also be a class that extends AbstractAttributes, the same construction method can be used for all.
