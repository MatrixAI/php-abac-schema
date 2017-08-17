{ pkgs ? import <nixpkgs> {} }:
  with pkgs;
  stdenv.mkDerivation {
    name = "php-abac-schema";
    buildInputs = [
      php71
    ] ++ (with php71Packages; [
      composer
    ]);
  }
