public class LinkedList{
  public Node head;
  
  
  
  public LinkedList(Object [] a){
    Node n1=new Node(a[0],null);
    head=n1;
    Node tail=head;
    for(int i=1;i<a.length;i++)
    {
      Node temp=new Node(a[i],null);
      tail.next=temp;
      tail=temp;
    }
  }
  
  public LinkedList(Node h){
    head=h;
  }
  
  public int countNode(){
	  System.out.println();
    int i=0;
    for(Node n=head;n!=null;n=n.next){
      i++;
    }
    return i; 
  }
  
  public void printList(){    
	  
    for(Node n=head;n!=null;n=n.next){
      if(n.next==null){
        System.out.print(n.element+".");
      }
      else{
        System.out.print(n.element+",");
      }
    }
    System.out.println();
  }
  
  public Node nodeAt(int idx){
    int i=0;
    Node n=null;
    if(idx>=0)
    {
      for(n=head;n!=null;n=n.next)
      {
        if(i==idx)
        {
          break;
        }
        i++;
      }
    }
     return n;
  }
  
  public Object get(int idx){
    int i=0;
    Node n=null;
    if(idx>=0){
      for(n=head;n!=null;n=n.next){
        if(i==idx){
          break;
        }
        i++;
      }
    }
     return n.element;
  }
  
 
  public Object set(int idx, Object elem){
    int i=0;
    Object d=null;
    Node n=null;
    for (n=head; n!=null;n=n.next) 
    {
		if (i==idx)
		{
			d=n.element;
			break;
		}
		else
		{
			i++;
		}
	}
    
    i=0;
    for (n=head; n!=null;n=n.next)  
    {
    	if (i==idx) 
    	{
			n.element=elem;
			break;
		}
    	else 
		{
    		i++;
		}
	}
    
    return d;
  }
  
  public int indexOf(Object elem){
	  int i=0;
    for (Node n=head; n!=null;n=n.next) 
    {
		if (elem==n.element)
		{
			break;
		}
		else
		{
			i++;
		}
	}
    return i; 
  }
  
  public boolean contains(Object elem){
    boolean b=false;
    for (Node n=head; n!=null;n=n.next) 
    {
    	if (elem==n.element)
    	{
    		b=true;
    	}
    	else
    	{
    		b=false;
    	}
    }
    return b; 
  }
  
  
  public Node copyList()
  {
	  Node newhead=null,tail=null;
	  int i=0;
	  for (Node n=head;n!=null;n=n.next)
	  {
		  Node n2=new Node(n.element,null);
		  if(i==0)
		  {
			  newhead=n2;
			  tail=n2;
			  i++;
		  }
		  else
		  {
			  tail.next=n2;
			  tail=n2;
		  }
		}
	  
	  return newhead;
  }
  
  
  public Node reverseList(){
	 Node copy=null, newhead=null;
	 for (Node n=head;n!=null;)
	 {
		 copy=n.next;
		 n.next=newhead;
		 newhead=n;
		 n=copy;
	 }
	 
	 head=newhead;
    return head;
  }
  
  
  public void insert(Object elem, int idx){
	  int index=0;
		int i=0;
		Node temp=null,tail=null;
		
		for (Node c=head;c!=null;c=c.next)
		{
			index++;
			tail=c;
		}

		if(idx==0)
		{
			Node send=new Node (elem,null);
			send.next=head;
			head=send;
		}
		
		else if (idx==index)
		{
			Node send=new Node (elem,null);
			tail.next=send;
		}
		
		else
		{
			for (Node s=head;s!=null;s=s.next)
			{
				if (i==idx)
				{
					Node send=new Node (elem,null);
					send.next=temp.next;
					temp.next=send;
					break;
				}
				else 
				{
					temp=s;
					i++;
				}
			}
		}
  }
  
  
  public Object remove(int index)
  {
    Object Node=null;
    Node tail=null;
    Node temp = null;
    int count=countNode();
    if(index==0)
    {
    	Node=head.element;
    	head=head.next;
    }
    else if(index==count)
    {
    	int i=0;
    	for (Node n=head;n!=null;n=n.next)
    	{
    		if(i==(count-1))
    		{
    			tail=n;
    			i++;
    		}
    		else
    		{
    			Node=n.element;
    			i++;
    		}
    	}
    	tail.next=null;
    }
    
    else 
    {
    	tail=nodeAt(index);
    	Node=tail.element;
        for (Node n=head;n!=null;n=n.next)
    	    {
    	    	if(n.equals(tail))
    	    	{
    	    		break;
    	    	}
    	    	else
    	    	{
    	    		temp=n;
    	    	}
    	    }
    	 temp.next=tail.next;
    }
   return Node;
  }
  
  
  public void rotateLeft()
  {
	  int n=1,i=0;
		Node newhead,tail = null,sub = null;
		newhead=head;
		for (Node s=head;s!=null;s=s.next)
		{
			if(i==n)
			{
				
				head=s;
				i++;
			}
			else
			{
				if(i==(n-1))
				{
					sub=s;
					i++;
				}
				else
				{
					tail=s;
					i++;
				}
			}
		}
		sub.next=null;
		tail.next=newhead;
  }
  
  public void rotateRight()
  {
   
	    int i=0;
		Node tail = null,sub = null;
		int count =countNode();
		for (Node s=head;s!=null;s=s.next)
		{
			if(i==(count-2))
			{
				sub=s;
				i++;
			}
			else
			{
				tail=s;
				i++;
			}
		}
		tail.next=head.next;
		sub.next=head;
		head.next=null;
		head=tail;
	}
  
}