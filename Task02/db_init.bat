#!/bin/bash
python3 generat_sql.py
sqlite3 movies_rating.db < db_init.sql