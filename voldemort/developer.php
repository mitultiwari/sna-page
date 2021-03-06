<?php require "includes/project_info.php" ?>
<?php require "../includes/header.php" ?>
<?php include "../includes/advert.php" ?>

<h3>Getting Started With The Source Code</h3>

<p>
For programmers interested in getting to know the source code, here are a few pointers to get started. One good starting place is the <a href="http://www.allthingsdistributed.com/2007/10/amazons_dynamo.html">Amazon Dynamo</a> paper, it is a bit dense in places but will give an idea of why certain things are done a given way.
</p>

<p>
Most packages have a <a href="javadoc/all/voldemort/package-use.html">javadoc.html</a> file that describes what the code in that package does, this can help to get a broad overview of the areas of the code.
</p>

<p>
Internally much of Voldemort implements a single very simple interface that provides basically put/get/delete given in <a href="javadoc/all/voldemort/store/Store.html">Store.java</a>.
</p>

<p>
Each Store implementation is in a subdirectory of <a href="javadoc/all/voldemort/store/package-summary.html">voldemort.store</a>. This is what allows layering of functionality for things like networking, conflict resolution, etc. A specialized instance of this is <a href="	javadoc/all/voldemort/store/StorageEngine.html">StorageEngine.java</a>
which provides the ability to iterate over all the keys. Implementations of this interface are responsible for the actual persistence of the data. The important StorageEngines are <a href="javadoc/all/voldemort/store/memory/InMemoryStorageEngine.html">InMemoryStorageEngine.java</a>, <a href="javadoc/all/voldemort/store/bdb/BdbStorageEngine.html">BdbStorageEngine.java</a>, and <a href="javadoc/all/voldemort/store/readonly/RandomAccessFileStore.html">RandomAccessFileStore.java</a>, each of which has a different persistence strategy.
</p>

<p>
The server code is found under <a href="javadoc/all/voldemort/server/package-summary.html">voldemort.server</a>, and the primary class is <a href="javadoc/all/voldemort/server/VoldemortServer.html">VoldemortServer.java</a>. Internally the server is comprised of multiple smaller services that handle particular functionality such as storage, various kinds of networking, etc. These services implement a very simple VoldemortService lifecycle interface to allow them to be started and stopped with the server.
</p>

<p>
The client code is found under <a href="javadoc/all/index.html?voldemort/store/bdb/BdbStorageEngine.html">voldemort.client</a>. <a href="javadoc/all/voldemort/client/StoreClient.html">StoreClient.java</a> is the interface the user interacts with. This is little more than a richer wrapper around a Store that provides a friendlier API, but it also serves to isolate client code from internal changes to avoid API breakage. To see how the various layers are wired up in the client look at <a href="javadoc/all/voldemort/client/AbstractStoreClientFactory.html">AbstractStoreClientFactory.java</a>, which does the bootstrapping and assembly necessary to create a functioning Java client.
</p>

<p>
Code related to versioning is under <a href="javadoc/all/voldemort/versioning/package-summary.html">voldemort.versioning</a>; in particular the class used for conflict resolution is <a href="javadoc/all/voldemort/versioning/VectorClock.html">VectorClock.java</a>.
</p>

<p>
That is all there is, it isn't a terribly large project so hopefully it isn't too difficult to get started. Feel free to ping the <a href="http://groups.google.com/group/project-voldemort">mailing list</a> with any questions that may come up.
</p>

<h3>Contributions</h3>

Code contributions are very welcome. There is a <a href="projects.php">project idea page</a> that has interesting (but sometimes non-trivial) projects if you want to see some ideas. Feel free to email the <a href="http://groups.google.com/group/project-voldemort">mailing list</a> if you want to discuss any idea you are considering or have questions about how to proceed. There is also an IRC channel at chat.us.freenode.net #voldemort.	
</p>
<p>
The best approach for actually submitting a contribution is to fork the project in git and make your changes available on github (or another public git repository). If you aren't familiar with git you can just download a tarball of the source code from the build server, create a patch against that, and email it to the mailing list. The project comes with eclipse settings that will enforce some basic stylistic guidelines, but if you don't use eclipse you can just copy the style you see elsewhere in the code base. Non-trivial code should have unit tests to keep it working.
</p>
<p>
Here is how to submit a change using git:
<ul>
  <li>Create a github account, if you don't already have one.</li>
  <li>Go to the <a href="http://github.com/voldemort/voldemort/tree/master">master voldemort</a> repository and click the fork button to create a copy in your own repo.</li>
  <li>Checkout the code: 
	<pre>git clone git://github.com/your_user_name/voldemort.git</pre>
  </li>
  <li>Do some programming</li>
  <li>Commit your changes: 
	<pre">git commit -a</pre>
  </li>
  <li>Push your changes back to github: 
    <pre>git push git://github.com/your_user_name/voldemort.git</pre>
  </li>
  <li><a href="http://groups.google.com/group/project-voldemort">Tell us</a> what you have done so it can be integrated.</li>
</ul>

<?php require "../includes/footer.php" ?>
