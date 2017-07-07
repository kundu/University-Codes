
public class ArrayQueue implements Queue{
    int size;
    int front;
    int rear;
    Object [] data;
    
    public ArrayQueue(){
        size=0;
        front = -1;
        rear = -1;
        data = new Object[5];
    }
    
//TO DO

    @Override
    public int size() {
        return size;
    }

    @Override
    public boolean isEmpty() {
        if(size==0)
            return true;
        else
            return false;
    }

    @Override
    public void enqueue(Object o) throws QueueOverflowException {
        if((size-1)==data.length)
        {
        	throw new QueueOverflowException();
        }
        else
        {
        	rear++;
        	size++;
        	data[rear]=o;
        }
    }

    @Override
    public Object dequeue() throws QueueUnderflowException {
    	Object save=data[0];
    	if(size==0)
    	{
    		throw new QueueUnderflowException();
    	}
    	else
    	{
    		size--;
    		rear--;
    		int v=0;
    		for(int c=1;c<=size;c++)
    		{
    			data[v]=data[c];
    			v++;
    		}
    	}
    	return save;
    }

    @Override
    public Object peek() throws QueueUnderflowException {
    	if (size==0)
    		throw new UnsupportedOperationException();
    	else
    		return data[0];
    }

    public String toString()
    {
    	String s="";
	    	for (int c = 0; c < size; c++) 
	        {
	    		s=s+data[c]+" ";
	        }
	    	return s;
    }
    @Override
    public Object[] toArray() {
        Object a[]=new Object[size];
        for (int c = 0; c < a.length; c++) 
        {
			a[c]=data[c];
		}
        return a;
    }

    @Override
    public int search(Object o) {
    	int c ;
    	for (c= 0; c < size; c++)
    	{
    		if(data[c].equals(o))
    			return c;
    	}
    	return -1;
       
    }
    
}