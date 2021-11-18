from open import fullfile, sourcefile

fullfile = open("../files/a-web/fullanswer.txt", "w")
fullfile.truncate()
fullfile.close()

sourcefile = open("../files/a-web/source.txt", "w")
sourcefile.truncate()
sourcefile.close()

textbook = open("../files/a-db/textbook.txt", "w")
textbook.truncate()
textbook.close()