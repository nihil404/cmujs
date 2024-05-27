<?php
class Article_model extends CI_Model {

    public function insertarticle($data) {
        if (isset($data['volumeid'])) {
            $this->db->insert('articles', $data);
            $article_id = $this->db->insert_id(); // Retrieve the inserted article ID
            return $article_id;
        }
        return false; // Return false if volumeid is not set
    }
    
    public function getAuthorByArticleId($articleId) {
        $this->db->select('authors.author_name');
        $this->db->from('article_author');
        $this->db->join('authors', 'article_author.audid = authors.audid');
        $this->db->where('article_author.articleid', $articleId);
        $query = $this->db->get();
        // Log the query result
        error_log('Query Result for Article ID ' . $articleId . ': ' . print_r($query->row(), true));
        return $query->row(); // Assuming you're expecting only one author per article
    }
    
    
    

    public function insertArticleAuthor($article_id, $author_id) {
        $data = array(
            'articleid' => $article_id,
            'audid' => $author_id
        );
        $this->db->insert('article_author', $data);
    }
    
    public function insertArticleSubmission($data) {
        $this->db->insert('article_submission', $data);
    }

    public function get_articles_with_authors() {
        $this->db->select('articles.*, authors.author_name, volume.volname AS volume_name'); // Include volume name
        $this->db->from('articles');
        $this->db->join('article_author', 'articles.articleid = article_author.article_id');
        $this->db->join('authors', 'article_author.audid = authors.audid');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left'); // Assuming volumeid is the foreign key
        $query = $this->db->get();
        return $query->result();
    }
 
    
public function get_article_id() {
    
    $query = $this->db->query("SELECT articleid FROM articles ORDER BY created_at DESC LIMIT 1"); 
    if ($query->num_rows() > 0) {
        $row = $query->row();
        return $row->id; // Return the article ID
    } else {
        return null; 
    }
}
public function get_article() {
    $this->db->select('articles.articleid, articles.title, articles.slug, articles.abstract, articles.created_at, volume.vol_name, articles.doi, articles.keywords');
    $this->db->from('articles');
    $this->db->join('article_submission', 'articles.slug = article_submission.slug');
    $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
    $this->db->where('volume.published', 1);
    $this->db->where('article_submission.payment', 1);
    $this->db->where('article_submission.review', 1);
    $this->db->where('article_submission.approved', 1);
    $this->db->where('article_submission.published', 1);
    $this->db->order_by('volume.vol_name', 'ASC'); // Order by volume.vol_name in ascending order

    $query = $this->db->get();
    return $query->result(); 
}



public function get_article_slug($slug) {
    $this->db->select('articles.articleid, articles.title, articles.slug, articles.abstract, articles.created_at, volume.vol_name, articles.doi, articles.keywords');
    $this->db->from('articles');
    $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
    $this->db->where('articles.slug', $slug);
    $query = $this->db->get();
    return $query->result(); 
}



public function get_latest_article() {
    $this->db->select('*');
    $this->db->from('articles');
    $this->db->order_by('created_at', 'DESC'); 
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return NULL;
    }
}

public function delete_article($articleid) {
    // Delete entries from the article_author table associated with the given articleid
    $this->db->where('articleid', $articleid);
    $this->db->delete('article_author');

    // Now, delete the article itself
    $this->db->where('articleid', $articleid);
    $this->db->delete('articles');

    // Return TRUE if deletion is successful, otherwise FALSE
    return TRUE; // Or return $this->db->affected_rows() > 0; if you want to check the number of affected rows
}

public function deleteArticle($articleId) {
    // Perform the database operation to delete the article
    $this->db->where('articleid', $articleid);
    $this->db->delete('article_author');

    // Now, delete the article itself
    $this->db->where('articleid', $articleid);
    $this->db->delete('articles');

    // Return TRUE if deletion is successful, otherwise FALSE
    return TRUE; // Or return $this->db->affected_rows() > 0; if you want to check the number of affected rows
}



// In Article_model.php

public function getSubmittedArticlesByUserId($user_id) {
    $this->db->select('articles.*, authors.author_name'); // Assuming you want to fetch article data and author names
    $this->db->from('articles');
    $this->db->join('article_author', 'articles.articleid = article_author.articleid');
    $this->db->join('authors', 'article_author.audid = authors.audid');
    $this->db->join('users', 'authors.uid = users.userid'); // Join with the users table to match the user ID
    $this->db->where('users.userid', $user_id); // Filter by the user ID
    $query = $this->db->get();
    return $query->result();
}




public function getArticle() {
    $query = $this->db->get('articles');
    return $query->result();
}



// Model: Article_model.php
public function updateArticle($data, $slug) {
    $this->db->where('slug', $slug);
    $this->db->update('articles', $data);

    
}



public function get_article_by_id($articleid) {
    $this->db->select('articles.articleid, articles.title, article_submission.filename, article_submission.payment, article_submission.date_paid, article_submission.review, article_submission.date_forwarded_review, article_submission.approved, article_submission.date_approved, article_submission.published, article_submission.date_published');
    $this->db->from('article_submission');
    $this->db->join('articles', 'articles.slug = article_submission.slug'); // assuming you join on slug
    $this->db->where('articles.articleid', $articleid);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
        return $query->row();
    } else {
        return false;
    }
}


public function update_article_submission($articleid, $articleData) {
    // Set date_paid based on payment status
    if (isset($articleData['payment'])) {
        if ($articleData['payment'] == 1) {
            $articleData['date_paid'] = date('Y-m-d H:i:s');
        } else {
            $articleData['date_paid'] = null;
        }
    }

    // Set date_forwarded_review based on review status
    if (isset($articleData['review'])) {
        if ($articleData['review'] == 1) {
            $articleData['date_forwarded_review'] = date('Y-m-d H:i:s');
        } else {
            $articleData['date_forwarded_review'] = null;
        }
    }

    // Set date_approved based on approval status
    if (isset($articleData['approved'])) {
        if ($articleData['approved'] == 1) {
            $articleData['date_approved'] = date('Y-m-d H:i:s');
        } else {
            $articleData['date_approved'] = null;
        }
    }

    // Set date_published based on publishing status
    if (isset($articleData['published'])) {
        if ($articleData['published'] == 1) {
            $articleData['date_published'] = date('Y-m-d H:i:s');
        } else {
            $articleData['date_published'] = null;
        }
    }

    // Fetch slug from articles table using articleid
    $this->db->select('slug');
    $this->db->from('articles');
    $this->db->where('articleid', $articleid);
    $query = $this->db->get();
    $result = $query->row();

    if ($result) {
        $slug = $result->slug;

        // Update article_submission based on the fetched slug
        $this->db->where('slug', $slug);
        return $this->db->update('article_submission', $articleData);
    } else {
        // Handle the case where the article is not found
        return false;
    }
}


public function get_all_articles() {
    $this->db->select('articles.articleid, articles.title, articles.keywords, articles.abstract, articles.filename, article_submission.filename, article_submission.payment, article_submission.date_paid, article_submission.review, article_submission.date_forwarded_review, article_submission.approved, article_submission.date_approved, article_submission.layout, article_submission.published, article_submission.date_published, article_submission.slug, authors.author_name, authors.email AS author_email, volume.vol_name AS volume_name'); // Include volume name
    $this->db->from('articles');
    $this->db->join('article_author', 'articles.articleid = article_author.articleid');
    $this->db->join('authors', 'article_author.audid = authors.audid');
    $this->db->join('article_submission', 'articles.slug = article_submission.slug');
    $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left'); // Assuming volumeid is the foreign key
    $query = $this->db->get();
    return $query->result();
}

public function searchArticles($searchQuery) {
    $this->db->like('title', $searchQuery);
    $this->db->or_like('keywords', $searchQuery);
    $this->db->or_like('abstract', $searchQuery);
    $query = $this->db->get('articles'); // Assuming your articles table is named 'articles'
    return $query->result();
}
public function getAllArticles() {
    $query = $this->db->get('articles'); // Assuming your articles table is named 'articles'
    return $query->result();
}
// Article_model.php

public function getSubmittedArticleByUserId($user_id, $searchQuery = null) {
    $this->db->select('*');
    $this->db->from('articles');
    $this->db->where('audid', $user_id);
    
    // If search query is provided, filter the articles
    if ($searchQuery) {
        // Example: filter by article title
        $this->db->like('title', $searchQuery);
    }

    $query = $this->db->get();
    return $query->result();
}



public function updateArticleSubmission($data, $submission_id) {
    // Apply the where condition to update the specific submission
    $this->db->where('submissionid', $submission_id);

    // Update the filename column if provided in the data
    if (isset($data['filename'])) {
        $this->db->set('filename', $data['filename']);
    }

    // Execute the update query
    return $this->db->update('article_submission');
}



public function getSubmissionIdBySlug($slug) {
    $this->db->select('submissionid');
    $this->db->from('article_submission');
    $this->db->where('slug', $slug);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
        return $query->row()->submission_id;
    } else {
        return false;
    }
}

public function editArticle($slug) {
    $this->db->where('slug', $slug);
    $query = $this->db->get('articles');
    return $query->row();
}
}

