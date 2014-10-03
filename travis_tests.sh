#! /usr/bin/env bash

if [ -z $PLUGIN_DIR ]; then
  PLUGIN_DIR=`pwd`
fi

if [ -z $OMEKA_DIR ]; then
  export OMEKA_DIR=`pwd`/omeka
  echo "omeka_dir set"
fi

echo "Plugin Directory: $PLUGIN_DIR"
echo "Omeka Directory: $OMEKA_DIR"

cd $PLUGIN_DIR/tests/ && phpunit --configuration phpunit_travis.xml --coverage-text &> travis.out
ec=$?

cat travis.out

[[ "$ec" -eq "0" ]]
