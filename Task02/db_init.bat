#!/bin/bash
python3 generate_sql.py
sqlite3 movies_rating.db < db_init.sql