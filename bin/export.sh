#!/bin/bash

if [[ -f export/test_recrutement.zip ]]; then
  rm export/test_recrutement.zip
fi

if [[ -f export/test_recrutement.git ]]; then
  rm export/test_recrutement.git
fi

git bundle create export/test_recrutement.git HEAD

zip -j export/test_recrutement.zip export/test_recrutement.git README.md