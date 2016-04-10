<?php
namespace webbackuper\service;

class Generator
{
    const EXTENSION =       'sh';
    const SHEBANG =         '#!/usr/bin/env sh';
    const REDIRECT_OUTPUT = '2>&1';
}