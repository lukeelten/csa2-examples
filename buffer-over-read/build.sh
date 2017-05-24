#!/bin/bash
gcc -o test -fno-stack-protector -z execstack -no-pie main.c
