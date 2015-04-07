
 a simple web project that allows users to submit ideas about “Start-up” companies. A start-up idea includes information
about the title of the idea, a short description (a couple of paragraphs), the industry or market it
belongs to from a list of at least 5 pre-defined choices (e.g., health, technology, education, finance,
travel, etc.) and a set of relevant keywords/tags that better describe it. In order to submit an idea,
a user needs to be registered in the service by providing a name, an email address (that serves as
a login) and a password. Moreover, a registered user can navigate the list of already registered
“start-up” ideas and filter ideas by industry/market, by keyword/tag or sort them by name or date
of submission. In addition, a registered user can express her preference to an idea by liking or
disliking it. Your project is expected to support the following use cases:
1. User can register in the service.
2. User can login (session is created) and logout from the service (session has to be deleted).
3. User can post new start-up ideas.
4. User can see her submitted start-up ideas and can edit or delete an idea.
5. User can navigate already submitted ideas of other users.
6. User can see details of a specific idea (an individual page for each idea is expected).
7. User can express preference in favor or against an idea (like or dislike function).


</br>

 expand the project by providing a simple
RESTful interface to your service. The RESTful interface will provide two methods:
1. A method that retrieves the best k ideas submitted in a specified range of dates (e.g., you
want to get the best 5 ideas submitted in the time period between Jan 1st, 2015 and March
1
1st, 2015). The response should follow a JSON format. The starting and ending date, as well
as, the integer k are parameters of the method that need to be specified by the application
that sends the request. An idea is considered to be better than another, if it has received
more likes.
2. A method that retrieves a graph (it can be a dynamically created image) that illustrates the
distribution of ideas by each of the 5 pre-defined categories. You can use any third-party
graph/plot library for creating and visualizing the graph. The graph should include data
coming from all currently registered start-up ideas.
You should demonstrate the use of the above two methods by extending your Phase I project to
include one or (two) new webpage(s) that use the methods of the above RESTful API.

