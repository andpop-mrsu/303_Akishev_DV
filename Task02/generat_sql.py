import csv
import re
import os

tables = ['movies', 'ratings', 'tags', 'users']

data_base = open('Task02/db_init.sql', 'w+')

for i in range(len(tables)):
    data_base.write(f'DROP TABLE IF EXISTS {tables[i]};\n')

data_base.write(
    'create table movies(\n'
    '\tid int primary key,\n'
    '\ttitle text,\n'
    '\tyear int,\n'
    '\tgenres text\n'
    ');\n'
    '\n')
data_base.write(
    'create table ratings(\n'
    '\tid int primary key,\n'
    '\tuser_id int,\n'
    '\tmovie_id int,\n'
    '\trating float,\n'
    '\ttimestamp int\n'
    ');\n'
    '\n')
data_base.write(
    'create table tags(\n'
    '\tid int primary key,\n'
    '\tuser_id int,\n'
    '\tmovie_id int,\n'
    '\ttag text,\n'
    '\ttimestamp int\n'
    ');\n'
    '\n')
data_base.write(
    'create table users(\n'
    '\tid int primary key,\n'
    '\tname text,\n'
    '\temail text,\n'
    '\tgender text,\n'
    '\tregister_date text,\n'
    '\toccupation text\n'
    ');\n'
    '\n')


data_base.write(
    'insert into movies(id, title, year, genres)\n'
    'values\n'
)

with open('Task02/movies.csv', 'r') as movies_file:
    all_movies = ""
    reader = csv.DictReader(movies_file)
    for film in reader:
        title = film['title'].replace('"', '""').replace("'", "''")
        year = (lambda res: res.group(0) if res is not None else 'null')(re.search(r'\d{4}', film['title']))
        all_movies += f"({film['movieId']}, '{title}', {year}, '{film['genres']}'),\n"
    data_base.write(all_movies[:-2] + ';\n\n')

data_base.write(
    'insert into ratings(id, user_id, movie_id, rating, timestamp)\n'
    'values\n'
)

with open('Task02/ratings.csv') as ratings_file:
    all_ratings = ""
    reader = csv.DictReader(ratings_file)
    for ratingId, rating_row in enumerate(reader):
        timestamp = rating_row['timestamp']
        all_ratings += f"({ratingId + 1}, {rating_row['userId']}, {rating_row['movieId']}, {rating_row['rating']}, {rating_row['timestamp']}),\n"
    data_base.write(all_ratings[:-2] + ';\n\n')

data_base.write(
    'insert into tags(id, user_id, movie_id, tag, timestamp)\n'
    'values\n'
)
with open('Task02/tags.csv') as tags_file:
    all_tags = ""
    reader = csv.DictReader(tags_file)
    for tagId, tag_row in enumerate(reader):
        tag = tag_row['tag'].replace('"', '""').replace("'", "''")
        all_tags += f"({tagId + 1}, {tag_row['userId']}, {tag_row['movieId']}, '{tag}', {tag_row['timestamp']}),\n"
    data_base.write(all_tags[:-2] + ';\n\n')

data_base.write(
    'insert into users(id, name, email, gender, register_date, occupation)\n'
    'values\n'
)
with open('Task02/users.txt') as user_file:
    all_users = ""
    for user in user_file.readlines():
        user = user.rstrip().replace('"', '""').replace("'", "''").split('|')
        all_users += f"({user[0]}, '{user[1]}', '{user[2]}', '{user[3]}', '{user[4]}', '{user[5]}'),\n"
    data_base.write(all_users[:-2] + ';')