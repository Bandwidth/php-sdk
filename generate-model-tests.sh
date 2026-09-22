#!/bin/bash

# Generates new test files for models. Run from the root.

# allow generator to write test files
sed -i.bak 's/^tests\//# tests\//' .openapi-generator-ignore && rm .openapi-generator-ignore.bak
# remove current test files for models
rm -f ./tests/Unit/Model/*.php
# generate new test files for models
openapi-generator-cli generate -i bandwidth.yml -o ./ -c openapi-config.yml -g php-nextgen > /dev/null
# move generated model test files to the correct location
mv ./tests/Model/* ./tests/Unit/Model/
# fix namespaces in moved test files
perl -pi -e 's/^namespace Bandwidth\\Test\\Model;/namespace Bandwidth\\Test\\Unit\\Model;/' ./tests/Unit/Model/*.php
# remove remaining generated test files
rm -rf ./tests/Api ./tests/Model
# discard changes to modified files only (leaves deletions and new test files intact)
modified=$(git diff --name-only --diff-filter=M) && [ -n "$modified" ] && echo "$modified" | xargs git checkout --
